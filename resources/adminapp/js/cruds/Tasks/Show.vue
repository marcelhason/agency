<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.view') }}
              <strong>{{ $t('cruds.task.title_singular') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <back-button></back-button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <div class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.name') }}
                        </td>
                        <td>
                          {{ entry.name }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.client') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="client.company_name"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.porject_type') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="porject_type.name"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.start_date') }}
                        </td>
                        <td>
                          {{ entry.start_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.deadtime') }}
                        </td>
                        <td>
                          {{ entry.deadtime }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.price') }}
                        </td>
                        <td>
                          {{ entry.price }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.costs') }}
                        </td>
                        <td>
                          {{ entry.costs }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.status') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="status.name">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.invoice') }}
                        </td>
                        <td>
                          <datatable-checkbox :value="entry.invoice">
                          </datatable-checkbox>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.paid') }}
                        </td>
                        <td>
                          <datatable-checkbox :value="entry.paid">
                          </datatable-checkbox>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.description') }}
                        </td>
                        <td>
                          <ckeditor
                            :editor="editor"
                            :value="entry.description"
                            disabled
                          >
                          </ckeditor>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.assingned') }}
                        </td>
                        <td>
                          <datatable-list :row="entry" field="assingned.name">
                          </datatable-list>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.task.fields.comments') }}
                        </td>
                        <td>
                          <datatable-list
                            :row="entry"
                            field="comments.description"
                          >
                          </datatable-list>
                        </td>
                      </tr>
                    </tbody>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableSingle from '@components/Datatables/DatatableSingle'
import DatatableCheckbox from '@components/Datatables/DatatableCheckbox'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
import DatatableList from '@components/Datatables/DatatableList'

export default {
  components: {
    DatatableSingle,
    DatatableCheckbox,
    ClassicEditor,
    DatatableList
  },
  data() {
    return {
      editor: ClassicEditor
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('TasksSingle', ['entry'])
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchShowData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('TasksSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
