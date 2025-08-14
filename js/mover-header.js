if (screen.width > 1200) {
    const heroGeneral = document.getElementById('hero-general');
    let pixeles = 0;
    
    setInterval(() => {
        pixeles += .6;
        heroGeneral.style.backgroundPositionY = `-${pixeles}px`;
        
        if (pixeles > 400) {
            pixeles = 0;
        }
    }, 100);
}
