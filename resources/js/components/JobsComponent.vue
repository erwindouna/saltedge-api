<template>
    <table class="table">
        <tbody>
        <tr :key="index" v-bind:class="{success: job.run, danger: !job.run}" v-for="(job, index) in allJobs">

        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['jobs'],
        data() {
            return {allJobs: this.jobs}
        },
        mounted() {

        },
        methods: {
            getJobs: function () {
                var self = this
                const url = 'api/jobs'
                axios.get(url, {
                    dataType: 'json',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    mode: 'no-cors',
                    credentials: 'include'
                })
                    .then(function (response) {
                        console.log(JSON.stringify(response.data))
                        //self.courses = response.data
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            }
        }
    }
</script>