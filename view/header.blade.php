<header class="fixed z-20 bg-white/80 backdrop-blur border-b border-gray-100 dark:border-gray-700/30 dark:bg-gray-900/80 w-full">
            <nav
              id="navbar"
              class=" relative inset-x-0"
            >
              <div class="container">
                <div
                  class="relative flex flex-wrap items-center justify-between gap-6 lg:gap-0 lg:py-4"
                >
                  <div
                    class="relative z-20 flex w-full justify-between md:px-0 lg:w-max"
                  >
                    <a href="/" aria-label="logo" class="flex items-center space-x-2">
                      <img src="/view/assets/confetti_cms_logo.png" class="h-20">
                    </a>

                    <button
                      aria-label="humburger"
                      id="hamburger"
                      class="relative -mr-6 p-6 lg:hidden"
                    >
                      <div
                        aria-hidden="true"
                        class="m-auto h-0.5 w-5 rounded bg-sky-900 transition duration-300 dark:bg-gray-300"
                      ></div>
                      <div
                        aria-hidden="true"
                        class="m-auto mt-2 h-0.5 w-5 rounded bg-sky-900 transition duration-300 dark:bg-gray-300"
                      ></div>
                    </button>
                  </div>
                  <div
                    id="layer"
                    aria-hidden="true"
                    class="fixed inset-0 z-10 h-screen w-screen origin-bottom scale-y-0 bg-white/70 backdrop-blur-2xl transition duration-500 dark:bg-gray-900/70 lg:hidden"
                  ></div>
                  <div
                    id="navlinks"
                    class="invisible absolute top-full left-0 z-20 w-full origin-top-right translate-y-1 scale-90 flex-col flex-wrap justify-end gap-6 rounded-3xl border border-gray-100 bg-white p-8 opacity-0 shadow-2xl shadow-gray-600/10 transition-all duration-300 dark:border-gray-700 dark:bg-gray-800 dark:shadow-none lg:visible lg:relative lg:flex lg:w-auto lg:translate-y-0 lg:scale-100 lg:flex-row lg:items-center lg:gap-0 lg:border-none lg:bg-transparent lg:p-0 lg:opacity-100 lg:shadow-none lg:peer-checked:translate-y-0 dark:lg:bg-transparent"
                  >
                    <div
                      class="text-gray-600 dark:text-gray-300 lg:pr-4"
                      x-data="{ open: false }"
                    >
                      <ul
                        class="space-y-6 text-base font-medium tracking-wide lg:flex lg:space-y-0 lg:text-sm"
                      >
                        <li
                          x-auto-animate
                          class="group relative"
                        >
                          <a
                            href="./solution.html"
                            class="block transition hover:text-primary dark:hover:text-primaryLight md:px-4"
                          >
                            <span>Product</span>
                          </a>

                          <div
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            x-description="Flyout menu, show/hide based on flyout menu state."
                            class="absolute left-0 z-10 pt-5 hidden w-screen max-w-max group-hover:flex"
                            x-ref="panel"
                            @click.away="open = false"
                          >
                            <div
                              class="w-screen max-w-md flex-auto overflow-hidden rounded-3xl bg-white text-sm leading-6 shadow-lg ring-1 ring-gray-900/5"
                            >
                              <div class="p-4">
                                <div
                                  class="group relative flex gap-x-6 rounded-lg p-4 hover:bg-gray-50"
                                >
                                  <div
                                    class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white"
                                  >
                                    <svg
                                      class="h-6 w-6 text-gray-600 group-hover:text-indigo-600"
                                      fill="none"
                                      viewBox="0 0 24 24"
                                      stroke-width="1.5"
                                      stroke="currentColor"
                                      aria-hidden="true"
                                    >
                                      <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z"
                                      ></path>
                                      <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z"
                                      ></path>
                                    </svg>
                                  </div>
                                  <div>
                                    <a href="#" class="font-semibold text-gray-900">
                                      Solutions
                                      <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">
                                      Get a better understanding of your traffic
                                    </p>
                                  </div>
                                </div>
                                <div
                                  class="group relative flex gap-x-6 rounded-lg p-4 hover:bg-gray-50"
                                >
                                  <div
                                    class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white"
                                  >
                                    <svg
                                      class="h-6 w-6 text-gray-600 group-hover:text-indigo-600"
                                      fill="none"
                                      viewBox="0 0 24 24"
                                      stroke-width="1.5"
                                      stroke="currentColor"
                                      aria-hidden="true"
                                    >
                                      <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59"
                                      ></path>
                                    </svg>
                                  </div>
                                  <div>
                                    <a href="#" class="font-semibold text-gray-900">
                                      Engagement
                                      <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">
                                      Speak directly to your customers
                                    </p>
                                  </div>
                                </div>
                                <div
                                  class="group relative flex gap-x-6 rounded-lg p-4 hover:bg-gray-50"
                                >
                                  <div
                                    class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white"
                                  >
                                    <svg
                                      class="h-6 w-6 text-gray-600 group-hover:text-indigo-600"
                                      fill="none"
                                      viewBox="0 0 24 24"
                                      stroke-width="1.5"
                                      stroke="currentColor"
                                      aria-hidden="true"
                                    >
                                      <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33"
                                      ></path>
                                    </svg>
                                  </div>
                                  <div>
                                    <a href="#" class="font-semibold text-gray-900">
                                      Security
                                      <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">
                                      Your customers' data will be safe and secure
                                    </p>
                                  </div>
                                </div>
                                <div
                                  class="group relative flex gap-x-6 rounded-lg p-4 hover:bg-gray-50"
                                >
                                  <div
                                    class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white"
                                  >
                                    <svg
                                      class="h-6 w-6 text-gray-600 group-hover:text-indigo-600"
                                      fill="none"
                                      viewBox="0 0 24 24"
                                      stroke-width="1.5"
                                      stroke="currentColor"
                                      aria-hidden="true"
                                    >
                                      <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z"
                                      ></path>
                                    </svg>
                                  </div>
                                  <div>
                                    <a href="#" class="font-semibold text-gray-900">
                                      Integrations
                                      <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">
                                      Connect with third-party tools
                                    </p>
                                  </div>
                                </div>
                                <div
                                  class="group relative flex gap-x-6 rounded-lg p-4 hover:bg-gray-50"
                                >
                                  <div
                                    class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white"
                                  >
                                    <svg
                                      class="h-6 w-6 text-gray-600 group-hover:text-indigo-600"
                                      fill="none"
                                      viewBox="0 0 24 24"
                                      stroke-width="1.5"
                                      stroke="currentColor"
                                      aria-hidden="true"
                                    >
                                      <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"
                                      ></path>
                                    </svg>
                                  </div>
                                  <div>
                                    <a href="#" class="font-semibold text-gray-900">
                                      Automations
                                      <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">
                                      Build strategic funnels that will convert
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div
                                class="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50"
                              >
                                <a
                                  href="#"
                                  class="flex items-center justify-center gap-x-2.5 p-3 font-semibold text-gray-900 hover:bg-gray-100"
                                >
                                  <svg
                                    class="h-5 w-5 flex-none text-gray-400"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                  >
                                    <path
                                      fill-rule="evenodd"
                                      d="M2 10a8 8 0 1116 0 8 8 0 01-16 0zm6.39-2.908a.75.75 0 01.766.027l3.5 2.25a.75.75 0 010 1.262l-3.5 2.25A.75.75 0 018 12.25v-4.5a.75.75 0 01.39-.658z"
                                      clip-rule="evenodd"
                                    ></path>
                                  </svg>
                                  Watch demo
                                </a>
                                <a
                                  href="#"
                                  class="flex items-center justify-center gap-x-2.5 p-3 font-semibold text-gray-900 hover:bg-gray-100"
                                >
                                  <svg
                                    class="h-5 w-5 flex-none text-gray-400"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                  >
                                    <path
                                      fill-rule="evenodd"
                                      d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z"
                                      clip-rule="evenodd"
                                    ></path>
                                  </svg>
                                  Contact sales
                                </a>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <a
                            href="/pricing"
                            class="block transition hover:text-primary dark:hover:text-primaryLight md:px-4"
                          >
                            <span>Pricing</span>
                          </a>
                        </li>
                      </ul>
                    </div>

                    <div
                      class="mt-12 -ml-1 flex w-full flex-col space-y-2 border-primary/10 dark:border-gray-700 sm:flex-row md:w-max lg:mt-0 lg:mr-6 lg:space-y-0 lg:border-l lg:pl-6"
                    >
                      <a
                        href="./docs.html"
                        class="relative ml-auto flex h-9 w-full items-center justify-center before:absolute before:inset-0 before:rounded-full before:bg-primary before:transition-transform before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 dark:before:border-gray-700 dark:before:bg-primaryLight sm:px-4 lg:before:border lg:before:border-gray-200 lg:before:bg-gray-100 lg:dark:before:bg-gray-800"
                      >
                        <span
                          class="relative text-sm font-semibold text-white dark:text-gray-900 lg:text-primary lg:dark:text-white"
                          >Docs</span
                        >
                      </a>
                    </div>
                    <button
                      aria-label="switch theme"
                      @click="toggleTheme"
                      class="switcher group relative hidden h-9 w-9 rounded-full before:absolute before:inset-0 before:rounded-full before:border before:border-gray-200 before:bg-gray-50 before:bg-gradient-to-b before:transition-transform before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 dark:before:border-gray-700 dark:before:bg-gray-800 lg:flex"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="transistion relative m-auto hidden h-5 w-5 fill-gray-500 duration-300 group-hover:rotate-180 group-hover:fill-yellow-400 dark:block dark:fill-gray-300"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="transistion relative m-auto h-5 w-5 fill-gray-500 duration-300 group-hover:-rotate-90 group-hover:fill-blue-900 dark:hidden"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                        ></path>
                      </svg>
                    </button>
                  </div>
                  <div class="fixed top-3 right-14 z-20 sm:right-24 lg:hidden">
                    <button
                      aria-label="switche theme"
                      class="switcher group relative flex h-9 w-9 rounded-full before:absolute before:inset-0 before:rounded-full before:border before:border-gray-200 before:bg-gray-50 before:bg-gradient-to-b before:transition-transform before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 dark:before:border-gray-700 dark:before:bg-gray-800"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="transistion relative m-auto hidden h-5 w-5 fill-gray-500 duration-300 group-hover:rotate-180 group-hover:fill-yellow-400 dark:block dark:fill-gray-300"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="transistion relative m-auto h-5 w-5 fill-gray-500 duration-300 group-hover:-rotate-90 group-hover:fill-blue-900 dark:hidden"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                        ></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </nav>
          </header>
