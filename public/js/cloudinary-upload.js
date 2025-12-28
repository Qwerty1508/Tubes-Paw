// public/js/cloudinary-upload.js
window.CloudinaryUploader = (function () {
    // Simulasi upload ke Cloudinary
    async function upload(file, options = {}) {
        return new Promise((resolve, reject) => {
            if (!file) {
                reject(new Error('No file provided'));
                return;
            }

            // Validasi ukuran file
            if (file.size > 10 * 1024 * 1024) {
                reject(new Error('File too large (max 10MB)'));
                return;
            }

            // Simulasi progress
            let progress = 0;
            const interval = setInterval(() => {
                progress += Math.random() * 20;
                if (progress >= 100) {
                    progress = 100;
                    clearInterval(interval);
                    
                    // Simulasi hasil upload
                    const reader = new FileReader();
                    reader.onload = () => {
                        resolve({
                            secure_url: reader.result,
                            public_id: 'culinaire/menus/' + file.name.replace(/\s+/g, '_')
                        });
                    };
                    reader.readAsDataURL(file);
                }
                if (options.onProgress) {
                    options.onProgress(progress, progress, 100);
                }
            }, 100);
        });
    }

    // Fungsi untuk membuat progress bar
    function createProgressBar(containerId) {
        const container = document.getElementById(containerId);
        if (!container) {
            console.warn('Progress container not found:', containerId);
            return {
                show: () => {},
                update: () => {},
                success: () => {},
                error: () => {},
                reset: () => {}
            };
        }

        return {
            show() {
                container.innerHTML = `
                    <div class="alert alert-info mb-0">
                        <div class="d-flex justify-content-between mb-2">
                            <strong>📤 Mengunggah gambar...</strong>
                            <span id="progressPercent">0%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-primary" id="progressBar" role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>
                `;
            },
            update(percent, loaded, total) {
                const bar = container.querySelector('#progressBar');
                const percentEl = container.querySelector('#progressPercent');
                if (bar) bar.style.width = percent + '%';
                if (percentEl) percentEl.textContent = Math.round(percent) + '%';
            },
            success(message) {
                container.innerHTML = `<div class="alert alert-success mb-0">${message}</div>`;
            },
            error(message) {
                container.innerHTML = `<div class="alert alert-danger mb-0">${message}</div>`;
            },
            reset() {
                container.innerHTML = '';
            }
        };
    }

    return {
        upload,
        createProgressBar
    };
})();