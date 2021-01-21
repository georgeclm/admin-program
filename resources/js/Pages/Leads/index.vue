<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Leads</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered bg-white">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Age</th>
              <th>Date of Birth</th>
              <th>Package</th>
              <th>Added on</th>
              <th></th>
            </tr>
            <tr v-for="lead in leads" :key="lead.id">
              <!-- for loop inside inertia js using v-for inside the class-->
              <td>{{ lead.id }}</td>
              <td>{{ lead.name }}</td>
              <td>{{ lead.email }}</td>
              <td>{{ lead.phone }}</td>
              <td>{{ lead.age }}</td>
              <td>{{ lead.dob }}</td>
              <td>{{ lead.interested_package }}</td>
              <td>{{ lead.created_at }}</td>
              <td>
                <!-- This is for routing using ziggs by taking the id inside this table and this use the name inside the web.php the name for the view is lead.view inside web -->
                <inertia-link :href="route('lead.view', { lead: lead })">
                  Go
                </inertia-link>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import Layout from "../../Shared/Layout.vue";
export default {
  components: {
    Layout,
  },
  props: ["leads"],
};
</script>