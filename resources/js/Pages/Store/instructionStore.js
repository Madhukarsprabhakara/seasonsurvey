import { defineStore } from 'pinia'
import { useForm, usePage } from '@inertiajs/vue3';   

export const useInstructionStore = defineStore('surveylink', {
    state: () => {
    return { 
      count: 3,
      showRuleInstructions: true,
      
    }
  },
  // could also be defined as
  // state: () => ({ count: 0 })
  actions: {
    increment() {
      this.count++
    },
    toggleshowRuleInstructions() {
      if (this.showRuleInstructions)
      {
        this.showRuleInstructions=false
      }
      this.showRuleInstructions=true
    },
   
  },
})