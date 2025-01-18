function updateNav() {
    const navLinks = document.querySelectorAll('nav li a');

    

    // Update navigation links based on whether the user is logged in
    navLinks.forEach(link => {
        const href = link.getAttribute('href');

        if (isLoggedIn) {
            // Update 'Log In / Sign Up' to 'Account' and redirect to account.php
            if (href.includes('login.php')) {
                link.textContent = 'Account';
                link.setAttribute('href', 'account.php');
            }

            // Show the 'Log Out' link for logged-in users
            if (href.includes('logout.php')) {
                link.style.display = 'inline-block';
            } else if (href.includes('cart.php')) {
                link.style.display = 'inline-block';
            } else if (href.includes('home.php')) {
                link.style.display = 'inline-block';
            } else if (href.includes('shop.php')) {
                link.style.display = 'inline-block';
            } else if (href.includes('about.php')) {
                link.style.display = 'inline-block';
            }
        } else {
            // Hide 'Account' and 'Log Out' links when logged out
            if (href.includes('account.php') || href.includes('logout.php')) {
                link.style.display = 'none';
            }

            // Show 'Log In / Sign Up' link when logged out
            if (href.includes('login.php')) {
                link.style.display = 'inline-block';
            }

            // Ensure that common links are visible to everyone
            if (href.includes('home.php') || href.includes('shop.php') || href.includes('cart.php') || href.includes('about.php')) {
                link.style.display = 'inline-block';
            }
        }
    });
}

// Run the updateNav function after the page loads
window.onload = updateNav;
