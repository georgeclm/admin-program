<template>
  <form v-on:submit.prevent="handleFormSubmit">
    <div class="form-group">
      <label for="name">Name</label>
      <input
        type="text"
        class="form-control"
        v-model="localPackage.name"
        required
      />
    </div>
    <div class="form-group">
      <label for="amount">Price</label>
      <input
        type="text"
        class="form-control"
        v-model="localPackage.amount"
        required
      />
    </div>
    <div class="form-group">
      <label for="amount">Number of days</label>
      <input
        type="number"
        class="form-control"
        v-model="localPackage.number_of_days"
        required
      />
    </div>
    <button class="btn btn-success">Save</button>
  </form>
</template>
<script>
export default {
  props: {
    packageData: Object,
  },
  created() {
    this.localPackage = this.packageData;
  },
  data() {
    return {
      localPackage: {
        name: "",
        amount: 0.0,
        number_of_days: 0,
      },
    };
  },
  methods: {
    handleFormSubmit() {
      let postData = {
        name: this.localPackage.name,
        amount: this.localPackage.amount,
        number_of_days: this.localPackage.number_of_days,
      };
      // send the form data
      this.$emit("packageAdded", postData);
      // and then empty the form again for other
      this.localPackage = {
        name: "",
        amount: 0.0,
        number_of_days: 0,
      };
    },
  },
};
</script>