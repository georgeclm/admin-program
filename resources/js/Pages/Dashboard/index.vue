<template>

    <div>

        <p>This is dashboard,  Welcome {{ fname }}, {{ lname }}  </p>
    </div>
</template>
<script>
export default {
    props:['fname','lname']
}
</script>
