import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import ClientsIndex from './cruds/Clients'
import ClientsSingle from './cruds/Clients/single'
import ProjectsIndex from './cruds/Projects'
import ProjectsSingle from './cruds/Projects/single'
import ProjectTypesIndex from './cruds/ProjectTypes'
import ProjectTypesSingle from './cruds/ProjectTypes/single'
import TasksIndex from './cruds/Tasks'
import TasksSingle from './cruds/Tasks/single'
import StatusesIndex from './cruds/Statuses'
import StatusesSingle from './cruds/Statuses/single'
import CommentsIndex from './cruds/Comments'
import CommentsSingle from './cruds/Comments/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    ClientsIndex,
    ClientsSingle,
    ProjectsIndex,
    ProjectsSingle,
    ProjectTypesIndex,
    ProjectTypesSingle,
    TasksIndex,
    TasksSingle,
    StatusesIndex,
    StatusesSingle,
    CommentsIndex,
    CommentsSingle
  },
  strict: debug
})
