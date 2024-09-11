import { defineStore } from 'pinia'
import { useForm, usePage } from '@inertiajs/vue3';   

export const useSurveyStore = defineStore('surveylink', {
    state: () => {
    return { 
      count: 3,
      skipmap: [],
      fields: {},
      form: null,
    }
  },
  // could also be defined as
  // state: () => ({ count: 0 })
  actions: {
    increment() {
      this.count++
    },
    addSkipMap(key, value) {
      const existingEntry = this.skipmap.find(entry => Object.keys(entry)[0] === key)
      if (existingEntry) {
        existingEntry[key] = value
      } else {
        this.skipmap[key]=value
      }
    },
    addFormFields(key, value) {
      //const existingEntry = this.fields.find(entry => Object.keys(entry)[0] === key)
      if (this.fields.hasOwnProperty(key)) {
        this.fields[key] = value
      } else {
        this.fields[key]=value
        
      }
      this.form = useForm(
        this.fields,
      )
    }
  },
})