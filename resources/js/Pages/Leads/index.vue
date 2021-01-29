<template>
  <layout>
    <div class="container">
      <div class="d-flex row mb-3">
        <div class="col-md-12">
          <div class="float-left h2">Member</div>
          <inertia-link
            class="float-right btn btn-outline-secondary"
            :href="route('lead.add')"
          >
            Add Member
          </inertia-link>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-12">
          <form class="form-inline" method="get" :action="route('lead.list')">
            <input
              type="text"
              class="form-control mr-3 col-sm-4"
              placeholder="Search a member by name or phone"
              name="search"
            />
            <select
              name="package_search"
              id="search=package"
              class="form-control col-sm-2 mr-3"
            >
              <option value="0" selected>All</option>
              <option value="3">Yearly package</option>
              <option value="2">Half yearly package</option>
              <option value="1">Monthly package</option>
            </select>
            <button class="btn btn-outline-primary mr-3">Filter</button>
            <a :href="route('lead.list')" class="btn btn-outline-danger"
              >Reset</a
            >
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
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
            <tr v-for="lead in leads.data" :key="lead.id">
              <!-- for loop inside inertia js using v-for inside the class-->
              <td v-if="lead.added_by == user">{{ lead.id }}</td>
              <td v-if="lead.added_by == user">
                <inertia-link :href="route('lead.view', { lead: lead })">{{
                  lead.name
                }}</inertia-link>
              </td>
              <td v-if="lead.added_by == user">{{ lead.email }}</td>
              <td v-if="lead.added_by == user">{{ lead.phone }}</td>
              <td v-if="lead.added_by == user">{{ lead.age }}</td>
              <td v-if="lead.added_by == user">{{ lead.dob }}</td>
              <td v-if="lead.added_by == user">
                {{ lead.interested_package }}
              </td>
              <td v-if="lead.added_by == user">{{ lead.created_at }}</td>
              <td v-if="lead.added_by == user">
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
  props: ["leads", "user"],
};
</script>