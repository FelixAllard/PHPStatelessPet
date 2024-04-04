<!DOCTYPE html>
<html>
<head>
    <title>Search Items</title>
    <script>
        function searchItems() {
            var form = document.getElementById("searchForm");
            var input = form.elements["search"];
            var searchTerm = input.value.trim();

            //Take old stuff by ID
            var searchResults = document.getElementById("searchResults");
            //removes it!
            searchResults.innerHTML = "";

            // My API endpoint, I put it on 9000 due to some problems
            var url = "http://localhost:9000/api/ext/getItems";
            if (searchTerm !== "") {
                url += "/" + encodeURIComponent(searchTerm);
            }

            fetch(url)
                .then(response => response.json())
                .then(items => {
                    var searchResults = document.getElementById("searchResults");
                    //If the number of items is greater than 0, we will do the following logic
                    if (items.length > 0) {
                        //Create a simple h2 to put Search Result category
                        var heading = document.createElement("h2");
                        heading.textContent = "Found Pets : ";
                        searchResults.appendChild(heading);

                        items.forEach(item => {
                            var paragraph = document.createElement("p");
                            paragraph.textContent = "Name: " + item.name + ", Age: " + item.age;
                            //Adds the resulted string to our search result div!
                            searchResults.appendChild(paragraph);
                        });
                    } else {
                        //If equal to 0, we sadly have to create a P tag and say we didn't find anything
                        var paragraph = document.createElement("p");
                        paragraph.textContent = "No such item! Please try again";
                        //We append it once again to searchResult
                        searchResults.appendChild(paragraph);
                    }
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                });

            return false; // Prevent form submission, this prevents to go to another page :D,
            //Found this online and it fixed my problem
        }
    </script>
</head>
<body>
<h2>Search Items</h2>
<form id="searchForm" onsubmit="return searchItems()">
    <label for="name">Enter Pet Name:</label>
    <input type="text" id="name" name="search">
    <button type="submit">Search</button>
</form>

<div id="searchResults"></div>
</body>
</html>
