document.addEventListener('DOMContentLoaded', function() {
                                const input = document.getElementById('thumbnail');
                                const preview = document.getElementById('thumbnail-preview');
                                const currentUrl = preview.dataset.current || '';

                                input.addEventListener('change', function() {
                                    const file = this.files && this.files[0];
                                    if (!file) {
                                        if (currentUrl) {
                                            preview.src = currentUrl;
                                            preview.classList.remove('hidden');
                                        } else {
                                            preview.src = '';
                                            preview.classList.add('hidden');
                                        }
                                        return;
                                    }

                                    const url = URL.createObjectURL(file);
                                    preview.src = url;
                                    preview.classList.remove('hidden');
                                    preview.onload = () => URL.revokeObjectURL(url);
                                });
                            });
