(function () {
    function getCmsApiBase() {
        var meta = document.querySelector('meta[name="cms-api"]');
        return meta && meta.content ? meta.content.replace(/\/$/, '') : null;
    }

    document.addEventListener('DOMContentLoaded', function () {
        try {
            var base = getCmsApiBase();
            if (!base) return;

            var banners = document.querySelectorAll('[data-sponsor-id]');
            if (!banners.length) return;

            var trackedImpressions = new Set();

            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;

                    var el = entry.target;
                    var id = el.dataset.sponsorId;
                    observer.unobserve(el);

                    if (!id || trackedImpressions.has(id)) return;
                    trackedImpressions.add(id);

                    try {
                        fetch(base + '/sponsored-banners/' + id + '/impression', {
                            method: 'POST',
                            keepalive: true,
                        }).catch(function () {});
                    } catch (e) {}
                });
            }, { threshold: 0.5 });

            banners.forEach(function (el) {
                observer.observe(el);

                el.addEventListener('click', function () {
                    var id = el.dataset.sponsorId;
                    if (!id) return;

                    try {
                        navigator.sendBeacon(base + '/sponsored-banners/' + id + '/click');
                    } catch (e) {}
                });
            });
        } catch (e) {}
    });
})();
