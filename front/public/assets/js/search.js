const searchData = ()=>{
    const query = document.getElementById('search').value;
    location.href = `/search/${query}`;
}
function handleKeyDown(event) {
    if (event.key === "Enter") {
        searchData();
    }
}

