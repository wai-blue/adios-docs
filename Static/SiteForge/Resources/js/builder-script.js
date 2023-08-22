/*
xs (for phones - screens less than 576px wide)
sm (for tablets - screens equal to or greater than 576px wide)
md (for small laptops - screens equal to or greater than 768px wide)
lg (for laptops and desktops - screens equal to or greater than 992px wide)
xl (for laptops and desktops - screens equal to or greater than 1200px wide)
xxl (for laptops and desktops - screens equal to or greater than 1400px wide)
*/

// Path to the Markdown file relative to the HTML page
const rootURL = 'https://wai-blue.github.io/adios-docs/';

function redirectTo(url) {
    window.location.href = window.location.pathname + "?fileName=" + url;
}

$(document).ready(function() {
    const params = new URLSearchParams(window.location.search);
    const fileName = params.get('fileName');

    let markdownPath = rootURL + fileName;

    if (fileName !== null) {
        fetch(markdownPath)
            .then(response => response.text())
            .then(text => {
                // Target element to display the rendered Markdown
                document.getElementById('renderer').innerHTML = marked.parse(text);
            })
            .catch(error => {
                alert("Something went wrong");
            });
    }
});