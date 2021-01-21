<template>

    <layout>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>This is Dashboard, welcome {{fname }}, {{lname }}</p>
                </div>
            </div>
        </div>
    </layout>
</template>
<script>
import Layout from '../../Shared/Layout.vue'

export default {
    components:{

        Layout
    },
    props:['fname','lname']
}
</script>
