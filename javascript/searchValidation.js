// //Search Bar Validation

const searchForm = document.getElementById('searchForm');
const inputSearch = document.getElementById('search');
const errorSearch = document.getElementById('errorSearch');

searchForm.addEventListener('submit', (event) => {
    var searchMsg = new Array();
    if (inputSearch.value == '' || inputSearch.value.length <= 3) {
        searchMsg.push("Please enter a keyword longer than 3 characters ");
    }
    if (searchMsg.length > 0) {
        event.preventDefault();
        errorSearch.innerText = searchMsg.join(', ');
    }
});