// public/js/cloudinary-upload.js
window.CloudinaryUploader = {
    createProgressBar: function(containerId) {
        const container = document.getElementById(containerId);
        if (!container) {
            console.warn('Progress container not found');
            return {
                show: () => {},
                update: () => {},
                success: () => {},
                error: () => {},
                reset: () => {}
            };
        }
        // Implementasi dummy
        return {
            show: () => { container.innerHTML = '<div class="alert alert-info">Uploading...</div>'; },
            update: (percent) => { container.innerHTML = `<div class="progress"><div class="progress-bar" style="width:${percent}%"></div></div>`; },
            success: (msg) => { container.innerHTML = `<div class="alert alert-success">${msg}</div>`; },
            error: (msg) => { container.innerHTML = `<div class="alert alert-danger">${msg}</div>`; },
            reset: () => { container.innerHTML = ''; }
        };
    },
    upload: async function(file, options) {
        // Simulasi upload
        return new Promise((resolve) => {
            setTimeout(() => {
                resolve({ secure_url: URL.createObjectURL(file) });
            }, 1500);
        });
    }
};