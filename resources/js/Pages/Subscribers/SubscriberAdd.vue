<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
            <inertia-link :href="route('lead.list')">Members</inertia-link>
            <span class="breadcrumb-sep">/</span>
            Add Subscriber
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <subscriber-form
                :lead="lead"
                :packages="packages"
                @subscribeFormSubmit="handleSubscriberAdd"
              ></subscriber-form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import Layout from "../../Shared/Layout.vue";
import SubscriberForm from "../../Shared/SubscriberForm.vue";

export default {
  props: {
    lead: Object,
    packages: Array,
  },
  components: {
    Layout,
    SubscriberForm,
  },
  methods: {
    handleSubscriberAdd(postData) {
      console.log("postdataa", postData);
      this.$inertia.post(route("lead.subscribe.add"), postData);
    },
  },
};
</script>
