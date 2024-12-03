
document.querySelectorAll('.dropdown-btn').forEach(button => {
    button.addEventListener('click', function (e) {
        e.stopPropagation();

        const dropdown = this.nextElementSibling;

        const isOpen = dropdown.style.display === 'block';

        document.querySelectorAll('.dropdown-content').forEach(content => {
            content.style.display = 'none';
        });


        if (!isOpen) {
            dropdown.style.display = 'block';
        }
    });
});

document.addEventListener('click', () => {
    document.querySelectorAll('.dropdown-content').forEach(content => {
        content.style.display = 'none';
    });
});


function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return rect.top <= window.innerHeight && rect.bottom >= 0;
}

function showElementsOnScroll() {
    const hiddenElements = document.querySelectorAll('.container-product');
    hiddenElements.forEach((element) => {
        if (isInViewport(element)) {
            element.classList.add('visible');
        }
    });
}

window.addEventListener('scroll', showElementsOnScroll);

showElementsOnScroll();
