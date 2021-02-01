<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.task.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.name,
                      'is-focused': activeField == 'name'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.task.fields.name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.name"
                      @input="updateName"
                      @focus="focusField('name')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.client_id !== null,
                      'is-focused': activeField == 'client'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.task.fields.client')
                    }}</label>
                    <v-select
                      name="client"
                      label="company_name"
                      :key="'client-field'"
                      :value="entry.client_id"
                      :options="lists.client"
                      :reduce="entry => entry.id"
                      @input="updateClient"
                      @search.focus="focusField('client')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.porject_type_id !== null,
                      'is-focused': activeField == 'porject_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.task.fields.porject_type')
                    }}</label>
                    <v-select
                      name="porject_type"
                      label="name"
                      :key="'porject_type-field'"
                      :value="entry.porject_type_id"
                      :options="lists.porject_type"
                      :reduce="entry => entry.id"
                      @input="updatePorjectType"
                      @search.focus="focusField('porject_type')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.start_date,
                      'is-focused': activeField == 'start_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.task.fields.start_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.start_date"
                      @input="updateStartDate"
                      @focus="focusField('start_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.deadtime,
                      'is-focused': activeField == 'deadtime'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.task.fields.deadtime')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.deadtime"
                      @input="updateDeadtime"
                      @focus="focusField('deadtime')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.price,
                      'is-focused': activeField == 'price'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.task.fields.price')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.price"
                      @input="updatePrice"
                      @focus="focusField('price')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.costs,
                      'is-focused': activeField == 'costs'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.task.fields.costs')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.costs"
                      @input="updateCosts"
                      @focus="focusField('costs')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.status_id !== null,
                      'is-focused': activeField == 'status'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.task.fields.status')
                    }}</label>
                    <v-select
                      name="status"
                      label="name"
                      :key="'status-field'"
                      :value="entry.status_id"
                      :options="lists.status"
                      :reduce="entry => entry.id"
                      @input="updateStatus"
                      @search.focus="focusField('status')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div class="form-group form-check">
                    <label class="form-check-label"
                      ><input
                        class="form-check-input"
                        type="checkbox"
                        :value="entry.invoice"
                        :checked="entry.invoice"
                        @change="updateInvoice"
                      /><span class="form-check-sign"
                        ><span class="check"></span></span
                      >{{ $t('cruds.task.fields.invoice') }}</label
                    >
                  </div>
                  <div class="form-group form-check">
                    <label class="form-check-label"
                      ><input
                        class="form-check-input"
                        type="checkbox"
                        :value="entry.paid"
                        :checked="entry.paid"
                        @change="updatePaid"
                      /><span class="form-check-sign"
                        ><span class="check"></span></span
                      >{{ $t('cruds.task.fields.paid') }}</label
                    >
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.task.fields.description') }}</label>
                    <ckeditor
                      :editor="editor"
                      :value="entry.description"
                      @input="updateDescription"
                    >
                    </ckeditor>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.assingned.length !== 0,
                      'is-focused': activeField == 'assingned'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.task.fields.assingned')
                    }}</label>
                    <v-select
                      name="assingned"
                      label="name"
                      :key="'assingned-field'"
                      :value="entry.assingned"
                      :options="lists.assingned"
                      :closeOnSelect="false"
                      multiple
                      @input="updateAssingned"
                      @search.focus="focusField('assingned')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.comments.length !== 0,
                      'is-focused': activeField == 'comments'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.task.fields.comments')
                    }}</label>
                    <v-select
                      name="comments"
                      label="description"
                      :key="'comments-field'"
                      :value="entry.comments"
                      :options="lists.comments"
                      :closeOnSelect="false"
                      multiple
                      @input="updateComments"
                      @search.focus="focusField('comments')"
                      @search.blur="clearFocus"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

export default {
  components: {
    ClassicEditor
  },
  data() {
    return {
      status: '',
      activeField: '',
      editor: ClassicEditor
    }
  },
  computed: {
    ...mapGetters('TasksSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('TasksSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setName',
      'setClient',
      'setPorjectType',
      'setStartDate',
      'setDeadtime',
      'setPrice',
      'setCosts',
      'setStatus',
      'setInvoice',
      'setPaid',
      'setDescription',
      'setAssingned',
      'setComments'
    ]),
    updateName(e) {
      this.setName(e.target.value)
    },
    updateClient(value) {
      this.setClient(value)
    },
    updatePorjectType(value) {
      this.setPorjectType(value)
    },
    updateStartDate(e) {
      this.setStartDate(e.target.value)
    },
    updateDeadtime(e) {
      this.setDeadtime(e.target.value)
    },
    updatePrice(e) {
      this.setPrice(e.target.value)
    },
    updateCosts(e) {
      this.setCosts(e.target.value)
    },
    updateStatus(value) {
      this.setStatus(value)
    },
    updateInvoice(e) {
      this.setInvoice(e.target.checked)
    },
    updatePaid(e) {
      this.setPaid(e.target.checked)
    },
    updateDescription(value) {
      this.setDescription(value)
    },
    updateAssingned(value) {
      this.setAssingned(value)
    },
    updateComments(value) {
      this.setComments(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'tasks.index' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
