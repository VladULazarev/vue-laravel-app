<template> 
<div>
      <Transition name="fade">
            <PopUpWindow v-model:show="popUpVisivle">
                  <h3 class="text-lg font-normal mb-8">Мы получили ваше сообщение</h3>
                  <p class="font-light leading-6">
                        Если вы указали действующий email, то на вашу почту придет
                        письмо с подтверждением.
                  </p>
            </PopUpWindow>
      </Transition>

      <div v-if="!postsAreLoading"></div>
      <div v-else><div class="loader"></div></div> 

      <div class="grid sm:grid-cols-2 gap-4 p-0 sm:p-4">
            <div class="col-span-1">
               <div class="antialiased px-4">
                  <div class="max-w-xl divide-y md:max-w-4xl">                  
                        <div class="">
                           <h2 class="text-xl text-base font-semibold text-slate-900 mb-16">Отправить сообщение</h2>  
                           <form @submit.prevent="onSubmit" class="grid grid-cols-1 gap-6">
                              <label class="block">
                              <span class="text-gray-500 md:text-lg">Имя</span>
                              <input v-model.trim="message.name"
                                    v-focus
                                    maxlength = "20"
                                    type="text" class="
                                    mt-2 h-10 p-2 block w-full rounded-md
                                    bg-gray-100
                                    border-transparent
                                    focus:bg-white focus:ring-0
                                    " placeholder="Имя">
                              </label>
                              <label class="block">
                              <span class="text-gray-500 md:text-lg">Email</span>
                              <input v-model.trim="message.email"
                                    inputmode="email"
                                    maxlength = "50"
                                    type="email" class="
                                    mt-1 h-10 p-2 block w-full rounded-md
                                    bg-gray-100
                                    border-transparent
                                    focus:bg-white focus:ring-0
                                    " placeholder="john@example.com">
                              </label>
                              
                              <label class="block">
                              <span class="text-gray-500 md:text-lg">Ваше сообщение</span>
                              <textarea v-model.trim="message.text" 
                                    maxlength = "300" class="
                                    mt-1 p-2 block w-full rounded-md
                                    bg-gray-100
                                    border-transparent
                                    focus:border-gray-500 focus:bg-white focus:ring-0
                                    " rows="3"
                                    placeholder="Ваше сообщение"></textarea>
                              </label>

                              <button type="submit" 
                                    @click="sendMessage"
                                    class="
                                    text-white bg-teal-700 hover:bg-teal-800 
                                    focus:ring-4 focus:outline-none focus:ring-teal-600 
                                    font-medium rounded-lg text-sm w-full 
                                    sm:w-auto px-5 py-2.5 text-center 
                                    "
                              >
                              Отправить
                              </button>
                           </form>

                           <div v-if="errors" class="mt-8">
                              <div 
                                    class="font-medium p-1 text-fuchsia-600"
                                    :errors="errors"
                                    v-for="error in this.errors"                              
                              >
                              {{ cleanStr(error) }} 
                              </div>
                           </div>
                        </div>                      
                        </div>
                  </div>
            </div>   
            
            <ContactInfo/>

      </div>
      <div id="map" class="mt-16 mb-36">
            <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
</div>  
</template>

<script>
import PopUpWindow from "@/components/ui/PopUpWindow.vue";
import ContactInfo from "@/components/ContactInfo.vue";
import store from '@/store';

export default {
      components: {
            PopUpWindow, 
            ContactInfo
      },
      data() {
            return {
                  message: {
                        name: '',
                        email: '',
                        text: ''
                  },
                  errors: [],
                  popUpVisivle: false,
                  postsAreLoading: false
            }
      },

      methods: {
            async sendMessage(message) {

                  try {
                        this.postsAreLoading = true
                       
                        const response = await axios.post(store.state.currentDomain  + '/api/contact', {
                                    name: this.message.name,
                                    email: this.message.email,
                                    text: this.message.text
                              }                       
                        )

                        if ( response.status === 200 ) {

                              this.postsAreLoading = false

                              this.message.name = '',
                              this.message.email = '',
                              this.message.text = '',
                              this.errors = ''

                              this.popUpVisivle = true
                        }

                  } catch (e) {
 
                        this.postsAreLoading = false

                        if (typeof e.response === "undefined") {
                              alert('Что-то пошло не так... Сервер не отвечает на запрос.');
                        } else {
                              return this.errors =  e.response.data.errors;
                        }
                  } finally {
                        this.postsAreLoading = false
                  }
            },
            cleanStr(str) {
                  return str.toString();
            }

      }
}
</script>

<style scoped>

input:focus-visible,
textarea:focus-visible {
      outline: none;
      border-bottom: 1px solid #ddd;
}
</style>