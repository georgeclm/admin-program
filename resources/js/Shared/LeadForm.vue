<template>
  <form @submit.prevent="handleSubmit">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">Name</label>
          <input
            type="text"
            class="form-control"
            placeholder="Enter Name"
            v-model="lead.name"
            id="name"
            tabindex="1"
          />
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input
            type="text"
            class="form-control"
            placeholder="Enter Phone Number"
            v-model="lead.phone"
            id="phone"
            tabindex="2"
          />
        </div>
        <div class="form-group">
          <label for="ip">Interested Package</label>
          <select
            name="ip"
            id="ip"
            class="form-control"
            v-model="lead.interested_package"
            tabindex="3"
          >
            <option
              v-for="(option, key) in packages"
              v-bind:value="option.name"
              :key="key"
              v-bind:selected="option.name == mainLead.interested_package"
            >
              {{ option.name }} ({{ option.number_of_days }} days for Rp.
              {{ option.amount }})
            </option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="email"
            class="form-control"
            placeholder="Enter Email"
            v-model="lead.email"
            id="email"
            tabindex="4"
          />
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth</label>
          <input
            type="date"
            class="form-control"
            placeholder="Enter Date of Birth"
            v-model="lead.dob"
            id="dob"
            tabindex="5"
          />
        </div>
        <div class="form-group">
          <label for="age">Age</label>
          <input
            type="number"
            class="form-control"
            placeholder="Enter age"
            v-model="lead.age"
            id="age"
            tabindex="6"
            disabled
          />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <button class="btn btn-success">Save</button>
        <inertia-link class="btn btn-warning" :href="route('lead.list')">
          Back</inertia-link
        >
      </div>
    </div>
  </form>
</template>
<script>
export default {
  props: {
    mainLead: Object,
    packages: Array,
  },
  data() {
    return {
      lead: {
        name: "",
        email: "",
        phone: "",
        dob: "",
        package: "",
        age: "",
      },
    };
  },
  created() {
    this.lead = this.mainLead;
  },
  methods: {
    handleSubmit() {
      this.$emit("formSubmit", this.lead);
    },
    optionIsSelected(optionName, packageName) {
      console.log(optionName === packageName);
      return optionName === packageName;
    },
  },
};
</script>