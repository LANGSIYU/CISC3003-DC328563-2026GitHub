window.onload = function() {
    var hilightables = document.querySelectorAll('.hilightable');
    for (var i = 0; i < hilightables.length; i++) {
        var el = hilightables[i];
        el.addEventListener('focus', function() {
            this.classList.add('highlight');
        });
        el.addEventListener('blur', function() {
            this.classList.remove('highlight');
        });
    }

    var form = document.getElementById('mainForm');
    if (!form) return;

    form.addEventListener('submit', function(event) {
        var requireds = document.querySelectorAll('.required');
        var hasError = false;

        for (var i = 0; i < requireds.length; i++) {
            var req = requireds[i];
            if (req.value.trim() === '') {
                req.classList.add('error');
                hasError = true;
            } else {
                req.classList.remove('error');
            }
        }

        if (hasError) {
            event.preventDefault();
        }
    });

    var requireds = document.querySelectorAll('.required');
    for (var i = 0; i < requireds.length; i++) {
        var req = requireds[i];
        req.addEventListener('input', function() {
            this.classList.remove('error');
        });
    }

    form.addEventListener('reset', function() {
        var requireds = document.querySelectorAll('.required');
        for (var i = 0; i < requireds.length; i++) {
            requireds[i].classList.remove('error');
        }
    });
};