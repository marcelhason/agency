<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <event-hub></event-hub>
    <side-bar :sidebarLinks="sidebarLinks">
      <mobile-menu slot="content"></mobile-menu>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>
      <div class="content">
        <dashboard-content></dashboard-content>
      </div>
    </div>
  </div>
</template>

<script>
import DashboardContent from './Content.vue'
import TopNavbar from './TopNavbar.vue'
import MobileMenu from './MobileMenu.vue'

export default {
  components: {
    DashboardContent,
    TopNavbar,
    MobileMenu
  },
  data() {
    return {
      sidebarLinks: [
        {
          title: 'global.dashboard',
          icon: 'dashboard',
          path: { name: 'dashboard' }
        },
        {
          title: 'cruds.task.title',
          icon: 'table_view',
          path: { name: 'tasks.index' },
          gate: 'task_access'
        },
        {
          title: 'cruds.comment.title',
          icon: 'table_view',
          path: { name: 'comments.index' },
          gate: 'comment_access'
        },
        {
          title: 'cruds.dataManagement.title',
          icon: 'table_view',
          path: { name: 'data_management' },
          gate: 'data_management_access',
          children: [
            {
              title: 'cruds.project.title',
              icon: 'table_view',
              path: { name: 'projects.index' },
              gate: 'project_access'
            },
            {
              title: 'cruds.client.title',
              icon: 'table_view',
              path: { name: 'clients.index' },
              gate: 'client_access'
            }
          ]
        },
        {
          title: 'cruds.setting.title',
          icon: 'table_view',
          path: { name: 'setting' },
          gate: 'setting_access',
          children: [
            {
              title: 'cruds.projectType.title',
              icon: 'table_view',
              path: { name: 'project_types.index' },
              gate: 'project_type_access'
            },
            {
              title: 'cruds.status.title',
              icon: 'table_view',
              path: { name: 'statuses.index' },
              gate: 'status_access'
            }
          ]
        },
        {
          title: 'cruds.userManagement.title',
          icon: 'person',
          path: { name: 'user_management' },
          gate: 'user_management_access',
          children: [
            {
              title: 'cruds.permission.title',
              icon: 'perm_data_setting',
              path: { name: 'permissions.index' },
              gate: 'permission_access'
            },
            {
              title: 'cruds.role.title',
              icon: 'group',
              path: { name: 'roles.index' },
              gate: 'role_access'
            },
            {
              title: 'cruds.user.title',
              icon: 'person',
              path: { name: 'users.index' },
              gate: 'user_access'
            }
          ]
        }
      ]
    }
  }
}
</script>
