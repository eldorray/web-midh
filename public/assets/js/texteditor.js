document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('image');
            const preview = document.getElementById('image-preview');

            input.addEventListener('change', function() {
                const file = this.files && this.files[0];
                if (!file || !file.type.startsWith('image/')) {
                    preview.src = '#';
                    preview.classList.add('hidden');
                    return;
                }
                const url = URL.createObjectURL(file);
                preview.src = url;
                preview.classList.remove('hidden');
                preview.onload = () => URL.revokeObjectURL(url);
            });

            // Ensure trix editor values are copied into the hidden inputs before form submit.
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    try {
                        // misi
                        const misiInput = document.getElementById('misi_input');
                        const misiEditor = document.getElementById('misi');
                        if (misiInput && misiEditor && (!misiInput.value || misiInput.value.trim() ===
                                '')) {
                            misiInput.value = misiEditor.innerHTML || '';
                        }

                        // tujuan
                        const tujuanInput = document.getElementById('tujuan_input');
                        const tujuanEditor = document.getElementById('tujuan');
                        if (tujuanInput && tujuanEditor && (!tujuanInput.value || tujuanInput.value
                                .trim() === '')) {
                            tujuanInput.value = tujuanEditor.innerHTML || '';
                        }
                    } catch (err) {
                        // swallow errors to avoid blocking submit; logging in browser console for debugging
                        console.warn('Error preparing editor content for submit:', err);
                    }
                }, true);
            }
        });
