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
        initializeFilter(){
            this.activeTerm = 'all';

            Array.from(this.getFilters).forEach((filter, index) => {
                if(index == 0){
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

                }
            });
        },
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
                item.classList.add('invisible');
                item.classList.remove('opacity-100');
                item.classList.remove('order-0');
                
                item.classList.add('order-1');
                item.classList.add('opacity-0');

                const filtersDataset = item.dataset.terms.split(",");
                const filtered = filtersDataset.map(el => {
                    if(el == this.activeTerm || this.activeTerm === 'all') {
                        item.classList.remove('invisible');
                        item.classList.remove('opacity-0');
                        item.classList.remove('order-1');
                        item.classList.add('order-0');
                        item.classList.add('opacity-100');
                    }
                });
                return filtered;
            })
        },
    },
    mounted() {
        this.initializeFilter();
        this.activateFilter();
    }
}
</script>