document.addEventListener("DOMContentLoaded", function() {
    const searchForm = document.getElementById("searchForm");
    const searchInput = document.getElementById("search_term");
    const resultsDiv = document.getElementById("search_results");

    searchForm.addEventListener("submit", function(e) {
        e.preventDefault();
        const searchTerm = searchInput.value;

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/search", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                let resultsHTML = "";

                if (response.length > 0) {
                    for (const student of response) {
                        resultsHTML += `
                            <tr>
                                <td>${student.Student_ID}</td>
                                <td>${student.student_name}</td>
                                <td>${student.email}</td>
                                <td>${student.phone}</td>
                            </tr>`;
                    }
                } else {
                    resultsHTML = `
                        <tr>
                            <td colspan="4">No matching records found.</td>
                        </tr>`;
                }
                resultsDiv.innerHTML = resultsHTML;
            }
        };

        xhr.send("search_term=" + searchTerm);
    });
});


// =====================================================================

// navigation.js
document.addEventListener("DOMContentLoaded", function() {
    // Add a click event listener to your links
    const navigationLinks = document.querySelectorAll("[data-route]");

    navigationLinks.forEach(link => {
        link.addEventListener("click", function(e) {
            e.preventDefault();
            const route = link.getAttribute("data-route");

            // Redirect to the stored URL if available, otherwise, use the link's route
            const redirectUrl = sessionStorage.getItem('redirect_url') || route;
            window.location.href = redirectUrl;
        });
    });
});


