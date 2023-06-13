const btnMode = document.getElementById('btn-mode');

btnMode.addEventListener('click', () => {
    const nowMode = sessionStorage.getItem('data-layout-mode');
    console.log(nowMode);
    {nowMode === 'dark' ? sessionStorage.setItem('data-layout-mode', 'light') : sessionStorage.setItem('data-layout-mode', 'dark'); }
})
