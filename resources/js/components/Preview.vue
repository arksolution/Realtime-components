<template>
    <div>
        <iframe sandbox :id="id" class="w-full h-full resize-x" style="min-height:250px;">
        </iframe>
    </div>
</template>
<script>
    import { EventBus } from '../event-bus.js';
    
    export default {
        props:[
            'body'
        ],
        data() {
            return {
                iframe : '',
                id : this.uid,
                framework: ''
            }
        },
        mounted() {
            this.iframe = document.getElementById(this.id)
            if(this.body != '')
                this.iframe.src = "data:text/html;charset=utf-8," + encodeURI(this.body)
            if(this.body == undefined) 
                this.iframe.src = "data:text/html;charset=utf-8," + encodeURI(' ')
        },
        created() {
            EventBus.$on('changed', (data) => {
                data = this.framework + data
                this.iframe.src = "data:text/html;charset=utf-8," + encodeURI(data);
            })
            EventBus.$on('framework', (data) => {
                this.framework = data
            })
        },
    }
</script>
