const Rolldown = {
    sel: {
        root: '[data-rolldown]',
        trigger: '[data-rolldown-trigger]',
        target: '[data-rolldown-target]',
        activeClassName: 'active',
        fontAwesome: 'i',
    },

    toggleClassIfIconExists(icon) {
        if(icon) {
            icon.classList.toggle(Rolldown.sel.activeClassName);
        }
    },

    toggleActiveClassName(trigger) {
        Rolldown.toggleClassIfIconExists(trigger.querySelector(Rolldown.sel.fontAwesome))
    },

    initRollDown() {
        const rolldownNodes = document.querySelectorAll(Rolldown.sel.root);
        const rollDownElements = Array.from(rolldownNodes);

        rollDownElements.forEach(rolldown => {
            const rolldownTrigger = rolldown.querySelector(Rolldown.sel.trigger);
            const rolldownTarget = rolldown.querySelector(Rolldown.sel.target);

            rolldownTrigger.addEventListener('click', () => {
                rolldown.toggleAttribute('rolldown-expanded')
                Rolldown.toggleActiveClassName(rolldownTrigger);
            })
        })
    }
}

document.addEventListener('DOMContentLoaded', function() {
    Rolldown.initRollDown();
})