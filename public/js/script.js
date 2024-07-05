const searchInput = document.querySelector('#searchInput');
const searchBtn = document.querySelector('.search_btn');
const logoContainer = document.querySelector('.logo-container');

searchBtn.addEventListener('click', () => {
    const domain = searchInput.value.trim();

    if (domain !== "") {
        const img = document.createElement('img');
        img.setAttribute('src', `https://logo.clearbit.com/${domain}`);
        img.setAttribute('alt', `${domain} Logo`);
        img.setAttribute('class', 'logo');

        logoContainer.innerHTML = '';

        img.onerror = function() {
            alert(`No logo found for ${domain}`);
        };

        logoContainer.appendChild(img);
    } else {
        alert('Please enter a domain name');
    }
});
