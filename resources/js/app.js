import './bootstrap';
import 'preline';

document.addEventListener('livewire:navigated', () => {
    window.HSStaticMethods.autoInit();
})

document.addEventListener('livewire:load', function () {
    Livewire.on('updatedSelectedProvince', (provinceId) => {
        console.log('Province updated:', provinceId);
    });
});