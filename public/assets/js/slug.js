
                            document.addEventListener('DOMContentLoaded', function() {
                                const title = document.getElementById('title');
                                const slug = document.getElementById('slug');
                                if (!title || !slug) return;

                                let slugEdited = false;
                                slug.addEventListener('input', () => {
                                    slugEdited = true;
                                });

                                const slugify = (str) => str
                                    .toString()
                                    .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                                    .toLowerCase()
                                    .replace(/[^a-z0-9\s-]/g, '')
                                    .trim()
                                    .replace(/\s+/g, '-')
                                    .replace(/-+/g, '-');

                                const updateSlug = () => {
                                    if (slugEdited) return;
                                    slug.value = slugify(title.value);
                                };

                                title.addEventListener('input', updateSlug);

                                if (title.value && !slug.value) updateSlug();
                            });

