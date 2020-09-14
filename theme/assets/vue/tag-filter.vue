<template>
    <div>
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: "TagFilter",
    data() {
        return {
            activeTerm: null,
        };
    },
    computed: {
        getFilters() {
            return this.$slots.default[0].elm.children;
        },
        getItems() {
            return this.$slots.default[2].elm.children;
        },
    },
    methods: {
        activateFilter() {
            Array.from(this.getFilters).forEach(filter => {
                filter.addEventListener('click', (e) => {
                    filter.parentNode.childNodes.forEach(function(el){
                        if(el.classList){el.classList.remove('is-active')}
                    });

                    if(filter.classList.contains('is-active')){
                        filter.classList.remove('is-active');
                    } else {
                        filter.classList.add('is-active');
                    }
                    
                    this.activeTerm = filter.dataset.term;
                    this.filterTerms();
                })
            });
        },
        filterTerms() {
            Array.from(this.getItems).forEach(item => {
                item.classList.add('hidden')
                const filtersDataset = item.dataset.terms.split(",");
                const filtered = filtersDataset.map(el => {
                    if(el == this.activeTerm || this.activeTerm === 'all') {
                        item.classList.remove('hidden');
                    }
                });
                return filtered;
            })
        },
    },
    mounted() {
        this.activateFilter();
    }
}
</script>