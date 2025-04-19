//wait load
document.addEventListener('DOMContentLoaded', function() {
    // animation classes to blog articles
    const articles = document.querySelectorAll('.article-items, .article-items-gallery, .text-content, .image-contenct');
    articles.forEach((article, index) => {
        article.style.setProperty('--animation-order', index);
        article.classList.add('fade-in');
    });


    // Smooth scrolling for nav link
    const navLinks = document.querySelectorAll('.nav-list a');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // apply to internal links
            if (this.getAttribute('href').startsWith('#')) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // Add active class to current page in navigation
    const currentPage = window.location.pathname.split('/').pop();
    navLinks.forEach(link => {
        const linkPage = link.getAttribute('href');
        if (linkPage === currentPage) {
            link.style.color = '#ffffff';
            link.style.fontWeight = '700';
        }
    });

    // read more
    const articleParagraphs = document.querySelectorAll('article p');
    articleParagraphs.forEach(paragraph => {
        if (paragraph.textContent.length > 150) {
            const fullText = paragraph.textContent;
            const shortText = fullText.substring(0, 150) + '...';
            
            paragraph.textContent = shortText;
            
            const readMoreBtn = document.createElement('span');
            readMoreBtn.classList.add('read-more');
            readMoreBtn.textContent = 'Read More';
            
            paragraph.parentNode.insertBefore(readMoreBtn, paragraph.nextSibling);
            
            let expanded = false;
            readMoreBtn.addEventListener('click', function() {
                if (!expanded) {
                    paragraph.textContent = fullText;
                    readMoreBtn.textContent = 'Read Less';
                    expanded = true;
                } else {
                    paragraph.textContent = shortText;
                    readMoreBtn.textContent = 'Read More';
                    expanded = false;
                }
            });
        }
    });


    // Add hover effect for images
    const articleImages = document.querySelectorAll('article img');
    articleImages.forEach(img => {
    img.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.03)';
        this.style.transition = 'transform 0.3s ease';
    });
    
    img.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1)';
    });

    // Pop-up redirect
    img.addEventListener('click', function() {
        const name = img.dataset.name;
        const link = img.dataset.link;
        if (name && link) {
            const confirmMsg = `Do you want to know more about ${name}?`;
            if (confirm(confirmMsg)) {
                window.open(link, '_blank');
            }
        }
    });
});


    // Create dark mode toggle (even though the default is already dark)
    const body = document.body;
    
    /*
    // Create the dark mode toggle button
    const darkModeToggle = document.createElement('button');
    darkModeToggle.classList.add('dark-mode-toggle');
    darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>';
    darkModeToggle.setAttribute('title', 'Toggle Light/Dark Mode');
    */
    
    body.appendChild(darkModeToggle);
    
    // Initialize dark mode state
    let isDarkMode = true; // Default is dark


    /* -----------------------------------
    EXPAND GAMBAR -> FOR GALLERYYYY
     ------------------------------------*/

     function openLightbox() {
        document.getElementById('ImageLightbox').style.display = 'flex';
     }

     function closeLightbox() {
        document.getElementById('ImageLightbox').style.display = 'none';
     }

    

    
});