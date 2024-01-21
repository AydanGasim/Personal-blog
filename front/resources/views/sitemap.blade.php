<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xhtml="https://www.w3.org/1999/xhtml">
    <url>
        <loc>https://aydangasim.com/</loc>
        <lastmod>{{  date("Y-m-d") }}T{{  date("H:i:s") }}+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>https://aydangasim.com/about</loc>
        <lastmod>{{  date("Y-m-d") }}T{{  date("H:i:s") }}+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://aydangasim.com/contact</loc>
        <lastmod>{{  date("Y-m-d") }}T{{  date("H:i:s") }}+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://aydangasim.com/services</loc>
        <lastmod>{{  date("Y-m-d") }}T{{  date("H:i:s") }}+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    @foreach($categories as $category)
    <url>
        <loc>https://aydangasim.com/category/{{ $category->slug }}</loc>
        <lastmod>{{  date("Y-m-d") }}T{{  date("H:i:s") }}+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    @endforeach
    @foreach($blogs as $blog)
        <url>
            <loc>https://aydangasim.com/blog/{{ $blog->slug }}</loc>
            <lastmod>{{  date("Y-m-d") }}T{{  date("H:i:s") }}+00:00</lastmod>
            <priority>0.80</priority>
        </url>
    @endforeach
</urlset>

