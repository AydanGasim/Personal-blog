<?php

namespace App\Console\Commands;
use App\Mail\generalMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class instagramFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:instagram-feed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '15 dq bir gedir instagram postlarini getirir.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $instagram = [];
        try {

            $settings = DB::table('settings')->get();
            $accessToken = $settings[0]->instagram_access_token;

            $response = Http::get("https://graph.instagram.com/me/media", [
                'fields' => 'media_type,permalink,media_url,caption',
                'access_token' => $accessToken,
            ]);
            $instagram = $response->json();
            if(!$instagram){
                throw new \Exception("Operation failed");
            }
            if(count($instagram['data']) > 0){
                DB::table('instagram')->delete();
                foreach ($instagram['data'] as $key=>$post){
                    if($key == 8) break;
                    if($post['media_type']=="IMAGE"){
                        DB::table('instagram')
                            ->insert([
                                'permalink'=>$post['permalink'],
                                'media_url'=>$post['media_url'],
                                'post_id'=>$post['id'],
                                'caption'=>$post['caption'] ?? null,
                                'created_at'=>now(),
                                'updated_at'=>now(),
                            ]);
                    }
                }
            }
        } catch (\Exception $e) {

            $mailData = [
                'view' => "emails.instagram-error",
                "subject"=> "INSTAGRAM API - ERROR"
            ];
            Mail::to(strtolower('qasimzadaydan@gmail.com'))->queue(new generalMail($mailData));
        }

    }
}
