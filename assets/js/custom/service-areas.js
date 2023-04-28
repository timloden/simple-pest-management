const pestTypeButtons = document.querySelectorAll('.pest-type-button');
const pestTypeContents = document.querySelectorAll('.pest-type-content');

const clearActiveButtons = () => {
    pestTypeButtons.forEach((button) => {
        button.classList.remove('active');
    });
}

const clearActiveContent = () => {
    pestTypeContents.forEach((content) => {
        content.classList.add('d-none');
    });
}

const setActiveContent = (type) => {
    const id = `${type}-info`;
    const activeContent = document.getElementById(id);

    activeContent.classList.remove('d-none');
}

if (pestTypeContents.length > 0 && pestTypeButtons.length > 0) {
    pestTypeButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            clearActiveButtons();
            clearActiveContent();
            
            event.target.classList.add('active');
            setActiveContent(event.target.id);
        })
    });
}