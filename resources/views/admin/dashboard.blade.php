<x-admin-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-2 border-2 border-gray-200 border-dashed rounded-lg mt-14">
            {{-- content (slot on layouts/app.blade.php)--}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-lg font-medium text-gray-900">Bonjour, {{ Auth::user()->name }} </h1>
                    <p class="text-sm text-gray-600 md:w-[300px] sm:w-full mx-0 text-left">Ajoutez vos informations en quelques clics,et accédez  à une vue d’ensemble claire et sécurisée de toutes vos  données importantes.</p>
                    <div class="mt-4">
                      <a href="{{ route('admin.gestionGarages.create') }}">
                        <x-primary-button>ajouter un garage</x-primary-button>
                      </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- content --}}
        <div class="p-2 border-2 border-gray-200 border-dashed rounded-lg mt-4">
            {{-- content (slot on layouts/app.blade.php)--}}
            <div>
                <div>
                    <div class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        {{-- box 1 --}}
                        <div class="flex items-center bg-white p-8 rounded-lg shadow">
                            <div class="flex-shrink-0">
                              <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ \App\Models\User::count() }}</span>
                              <h3 class="text-base font-normal text-gray-500 first-letter:capitalize">nombre d'utilisateurs</h3>
                            </div>
                            <div class="ml-5 w-0 flex items-center justify-end flex-1 text-gray-600 text-base font-bold">
                              <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9 1.25C6.37665 1.25 4.25 3.37665 4.25 6C4.25 8.62335 6.37665 10.75 9 10.75C11.6234 10.75 13.75 8.62335 13.75 6C13.75 3.37665 11.6234 1.25 9 1.25ZM5.75 6C5.75 4.20507 7.20507 2.75 9 2.75C10.7949 2.75 12.25 4.20507 12.25 6C12.25 7.79493 10.7949 9.25 9 9.25C7.20507 9.25 5.75 7.79493 5.75 6Z" fill="currentColor"/>
                                <path d="M15 2.25C14.5858 2.25 14.25 2.58579 14.25 3C14.25 3.41421 14.5858 3.75 15 3.75C16.2426 3.75 17.25 4.75736 17.25 6C17.25 7.24264 16.2426 8.25 15 8.25C14.5858 8.25 14.25 8.58579 14.25 9C14.25 9.41421 14.5858 9.75 15 9.75C17.0711 9.75 18.75 8.07107 18.75 6C18.75 3.92893 17.0711 2.25 15 2.25Z" fill="currentColor"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.67815 13.5204C5.07752 12.7208 6.96067 12.25 9 12.25C11.0393 12.25 12.9225 12.7208 14.3219 13.5204C15.7 14.3079 16.75 15.5101 16.75 17C16.75 18.4899 15.7 19.6921 14.3219 20.4796C12.9225 21.2792 11.0393 21.75 9 21.75C6.96067 21.75 5.07752 21.2792 3.67815 20.4796C2.3 19.6921 1.25 18.4899 1.25 17C1.25 15.5101 2.3 14.3079 3.67815 13.5204ZM4.42236 14.8228C3.26701 15.483 2.75 16.2807 2.75 17C2.75 17.7193 3.26701 18.517 4.42236 19.1772C5.55649 19.8253 7.17334 20.25 9 20.25C10.8267 20.25 12.4435 19.8253 13.5776 19.1772C14.733 18.517 15.25 17.7193 15.25 17C15.25 16.2807 14.733 15.483 13.5776 14.8228C12.4435 14.1747 10.8267 13.75 9 13.75C7.17334 13.75 5.55649 14.1747 4.42236 14.8228Z" fill="currentColor"/>
                                <path d="M18.1607 13.2674C17.7561 13.1787 17.3561 13.4347 17.2674 13.8393C17.1787 14.2439 17.4347 14.6439 17.8393 14.7326C18.6317 14.9064 19.2649 15.2048 19.6829 15.5468C20.1014 15.8892 20.25 16.2237 20.25 16.5C20.25 16.7507 20.1294 17.045 19.7969 17.3539C19.462 17.665 18.9475 17.9524 18.2838 18.1523C17.8871 18.2717 17.6624 18.69 17.7818 19.0867C17.9013 19.4833 18.3196 19.708 18.7162 19.5886C19.5388 19.3409 20.2743 18.9578 20.8178 18.4529C21.3637 17.9457 21.75 17.2786 21.75 16.5C21.75 15.6352 21.2758 14.912 20.6328 14.3859C19.9893 13.8593 19.1225 13.4783 18.1607 13.2674Z" fill="currentColor"/>
                            </svg> 
                            </div>
                          </div>
                          {{-- box 2 --}}
                          <div class="flex items-center bg-white p-8 rounded-lg shadow">
                            <div class="flex-shrink-0">
                              <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ \App\Models\garage::count() }}</span>
                              <h3 class="text-base font-normal text-gray-500 first-letter:capitalize">nombre des garages</h3>
                            </div>
                            <div class="ml-5 w-0 flex items-center justify-end flex-1 text-gray-600 text-base font-bold">
                              <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4948 4.33224C12.6423 3.57447 11.3577 3.57447 10.5052 4.33224L4.50518 9.66558C4.02483 10.0926 3.75 10.7046 3.75 11.3472V21.2501H5.25L5.25 15.948C5.24997 15.0496 5.24994 14.3004 5.32991 13.7056C5.41432 13.0778 5.59999 12.511 6.05546 12.0555C6.51093 11.6 7.07773 11.4144 7.70552 11.33C8.3003 11.25 9.04952 11.25 9.94801 11.25H14.052C14.9505 11.25 15.6997 11.25 16.2945 11.33C16.9223 11.4144 17.4891 11.6 17.9445 12.0555C18.4 12.511 18.5857 13.0778 18.6701 13.7056C18.7501 14.3004 18.75 15.0496 18.75 15.9481V21.2501H20.25V11.3472C20.25 10.7046 19.9752 10.0926 19.4948 9.66558L13.4948 4.33224ZM21.75 21.2501V11.3472C21.75 10.2761 21.2919 9.25609 20.4914 8.54446L14.4914 3.21113C13.0705 1.94818 10.9295 1.94818 9.50864 3.21113L3.50864 8.54446C2.70805 9.25609 2.25 10.2761 2.25 11.3472V21.2501H2C1.58579 21.2501 1.25 21.5858 1.25 22.0001C1.25 22.4143 1.58579 22.7501 2 22.7501H22C22.4142 22.7501 22.75 22.4143 22.75 22.0001C22.75 21.5858 22.4142 21.2501 22 21.2501H21.75ZM17.25 21.2501V16.0001C17.25 15.036 17.2484 14.3885 17.1835 13.9054C17.1214 13.444 17.0142 13.2465 16.8839 13.1162C16.7536 12.9859 16.5561 12.8786 16.0946 12.8166C15.6116 12.7516 14.964 12.7501 14 12.7501H10C9.03599 12.7501 8.38843 12.7516 7.90539 12.8166C7.44393 12.8786 7.24643 12.9859 7.11612 13.1162C6.9858 13.2465 6.87858 13.444 6.81654 13.9054C6.75159 14.3885 6.75 15.036 6.75 16.0001V21.2501H17.25ZM9.25 9.00005C9.25 8.58584 9.58579 8.25005 10 8.25005H14C14.4142 8.25005 14.75 8.58584 14.75 9.00005C14.75 9.41426 14.4142 9.75005 14 9.75005H10C9.58579 9.75005 9.25 9.41426 9.25 9.00005ZM8.25 15.5001C8.25 15.0858 8.58579 14.7501 9 14.7501H15C15.4142 14.7501 15.75 15.0858 15.75 15.5001C15.75 15.9143 15.4142 16.2501 15 16.2501H9C8.58579 16.2501 8.25 15.9143 8.25 15.5001ZM8.25 18.5001C8.25 18.0858 8.58579 17.7501 9 17.7501H15C15.4142 17.7501 15.75 18.0858 15.75 18.5001C15.75 18.9143 15.4142 19.25 15 19.25H9C8.58579 19.25 8.25 18.9143 8.25 18.5001Z" fill="currentColor"/>
                              </svg> 
                            </div>
                          </div>
                          {{-- box 3 --}}
                          <div class="flex items-center bg-white p-8 rounded-lg shadow">
                            <div class="flex-shrink-0">
                              <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ \App\Models\Mechanic::count() }}</span>
                              <h3 class="text-base font-normal text-gray-500 first-letter:capitalize">nombre des mécaniciens</h3>
                            </div>
                            <div class="ml-5 w-0 flex items-center justify-end flex-1 text-gray-600 text-base font-bold">
                              <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.42677 1.25002C5.45086 1.25004 5.47528 1.25005 5.50005 1.25005C5.52482 1.25005 5.54924 1.25004 5.57332 1.25002C5.96605 1.24983 6.26904 1.24968 6.53655 1.30289C7.62745 1.51988 8.48021 2.37265 8.69721 3.46355C8.75042 3.73105 8.75027 4.03405 8.75007 4.42677C8.75006 4.45086 8.75005 4.47528 8.75005 4.50005V4.75005H15.25V4.50005C15.25 4.47528 15.25 4.45086 15.25 4.42677C15.2498 4.03405 15.2497 3.73105 15.3029 3.46355C15.5199 2.37265 16.3727 1.51988 17.4635 1.30289C17.7311 1.24968 18.034 1.24983 18.4268 1.25002C18.4509 1.25004 18.4753 1.25005 18.5 1.25005C18.5248 1.25005 18.5492 1.25004 18.5733 1.25002C18.966 1.24983 19.269 1.24968 19.5365 1.30289C20.6274 1.51988 21.4802 2.37265 21.6972 3.46355C21.7504 3.73105 21.7503 4.03404 21.7501 4.42676C21.7501 4.45084 21.75 4.47527 21.75 4.50005V6.50005C21.75 6.52482 21.7501 6.54925 21.7501 6.57334C21.7503 6.96606 21.7504 7.26904 21.6972 7.53654C21.4802 8.62744 20.6274 9.48021 19.5365 9.69721C19.269 9.75042 18.966 9.75027 18.5733 9.75007C18.5492 9.75006 18.5248 9.75005 18.5 9.75005C18.4753 9.75005 18.4509 9.75006 18.4268 9.75007C18.034 9.75027 17.7311 9.75042 17.4635 9.69721C16.3727 9.48021 15.5199 8.62744 15.3029 7.53655C15.2497 7.26904 15.2498 6.96605 15.25 6.57332C15.25 6.54924 15.25 6.52482 15.25 6.50005V6.25005H8.75005V6.50005C8.75005 6.52482 8.75006 6.54924 8.75007 6.57332C8.75027 6.96605 8.75042 7.26904 8.69721 7.53654C8.48021 8.62744 7.62744 9.48021 6.53655 9.69721C6.26904 9.75042 5.96605 9.75027 5.57332 9.75007C5.54924 9.75006 5.52482 9.75005 5.50005 9.75005C5.47528 9.75005 5.45086 9.75006 5.42677 9.75007C5.03405 9.75027 4.73105 9.75042 4.46355 9.69721C3.37265 9.48021 2.51988 8.62744 2.30289 7.53655C2.24968 7.26904 2.24983 6.96605 2.25002 6.57332C2.25004 6.54924 2.25005 6.52482 2.25005 6.50005V4.50005C2.25005 4.47528 2.25004 4.45086 2.25002 4.42677C2.24983 4.03405 2.24968 3.73105 2.30289 3.46355C2.51988 2.37265 3.37265 1.51988 4.46355 1.30289C4.73105 1.24968 5.03405 1.24983 5.42677 1.25002ZM7.25005 4.50005C7.25005 3.99944 7.24641 3.85867 7.22603 3.75618C7.1274 3.26032 6.73977 2.8727 6.24391 2.77407C6.14142 2.75368 6.00065 2.75005 5.50005 2.75005C4.99944 2.75005 4.85867 2.75368 4.75618 2.77407C4.26032 2.8727 3.8727 3.26032 3.77407 3.75618C3.75368 3.85867 3.75005 3.99944 3.75005 4.50005V6.50005C3.75005 7.00065 3.75368 7.14142 3.77407 7.24391C3.8727 7.73977 4.26032 8.1274 4.75618 8.22603C4.85867 8.24641 4.99944 8.25005 5.50005 8.25005C6.00065 8.25005 6.14142 8.24641 6.24391 8.22603C6.73977 8.1274 7.1274 7.73977 7.22603 7.24391C7.24641 7.14142 7.25005 7.00065 7.25005 6.50005V4.50005ZM16.75 6.50005C16.75 7.00065 16.7537 7.14142 16.7741 7.24391C16.8727 7.73977 17.2603 8.1274 17.7562 8.22603C17.8587 8.24641 17.9994 8.25005 18.5 8.25005C19.0007 8.25005 19.1414 8.24641 19.2439 8.22603C19.7398 8.1274 20.1274 7.73977 20.226 7.24391C20.2464 7.14142 20.25 7.00065 20.25 6.50005V4.50005C20.25 3.99944 20.2464 3.85867 20.226 3.75618C20.1274 3.26032 19.7398 2.8727 19.2439 2.77407C19.1414 2.75368 19.0007 2.75005 18.5 2.75005C17.9994 2.75005 17.8587 2.75368 17.7562 2.77407C17.2603 2.8727 16.8727 3.26032 16.7741 3.75618C16.7537 3.85867 16.75 3.99944 16.75 4.50005V6.50005ZM12.3859 8.85693C12.7411 9.07004 12.8563 9.53074 12.6432 9.88592L11.8247 11.25H13.5C13.7703 11.25 14.0196 11.3954 14.1527 11.6305C14.2858 11.8657 14.2822 12.1542 14.1432 12.3859L12.6432 14.8859C12.4301 15.2411 11.9694 15.3563 11.6142 15.1432C11.259 14.9301 11.1438 14.4694 11.3569 14.1142L12.1754 12.75H10.5C10.2298 12.75 9.98053 12.6047 9.8474 12.3696C9.71427 12.1344 9.71791 11.8459 9.85693 11.6142L11.3569 9.11418C11.57 8.75899 12.0307 8.64382 12.3859 8.85693ZM5.42677 14.25C5.45086 14.25 5.47528 14.25 5.50005 14.25C5.52482 14.25 5.54924 14.25 5.57332 14.25C5.96605 14.2498 6.26904 14.2497 6.53655 14.3029C7.62745 14.5199 8.48021 15.3727 8.69721 16.4635C8.75042 16.7311 8.75027 17.034 8.75007 17.4268C8.75006 17.4509 8.75005 17.4753 8.75005 17.5V17.75H15.25V17.5C15.25 17.4753 15.25 17.4509 15.25 17.4268C15.2498 17.034 15.2497 16.7311 15.3029 16.4635C15.5199 15.3727 16.3727 14.5199 17.4635 14.3029C17.7311 14.2497 18.034 14.2498 18.4268 14.25C18.4509 14.25 18.4753 14.25 18.5 14.25C18.5248 14.25 18.5492 14.25 18.5733 14.25C18.966 14.2498 19.269 14.2497 19.5365 14.3029C20.6274 14.5199 21.4802 15.3727 21.6972 16.4635C21.7504 16.7311 21.7503 17.034 21.7501 17.4268C21.7501 17.4508 21.75 17.4753 21.75 17.5V19.5C21.75 19.5248 21.7501 19.5492 21.7501 19.5733C21.7503 19.9661 21.7504 20.269 21.6972 20.5365C21.4802 21.6274 20.6274 22.4802 19.5365 22.6972C19.269 22.7504 18.9661 22.7503 18.5733 22.7501C18.5493 22.7501 18.5248 22.75 18.5 22.75C18.4753 22.75 18.4508 22.7501 18.4268 22.7501C18.034 22.7503 17.7311 22.7504 17.4635 22.6972C16.3727 22.4802 15.5199 21.6274 15.3029 20.5365C15.2497 20.269 15.2498 19.966 15.25 19.5733C15.25 19.5492 15.25 19.5248 15.25 19.5V19.25H8.75005V19.5C8.75005 19.5248 8.75006 19.5492 8.75007 19.5733C8.75027 19.966 8.75042 20.269 8.69721 20.5365C8.48021 21.6274 7.62744 22.4802 6.53655 22.6972C6.26904 22.7504 5.96606 22.7503 5.57334 22.7501C5.54925 22.7501 5.52482 22.75 5.50005 22.75C5.47527 22.75 5.45084 22.7501 5.42676 22.7501C5.03404 22.7503 4.73105 22.7504 4.46355 22.6972C3.37265 22.4802 2.51988 21.6274 2.30289 20.5365C2.24968 20.269 2.24983 19.9661 2.25002 19.5733C2.25004 19.5492 2.25005 19.5248 2.25005 19.5V17.5C2.25005 17.4753 2.25004 17.4509 2.25002 17.4268C2.24983 17.034 2.24968 16.7311 2.30289 16.4635C2.51988 15.3727 3.37265 14.5199 4.46355 14.3029C4.73105 14.2497 5.03405 14.2498 5.42677 14.25ZM7.25005 17.5C7.25005 16.9994 7.24641 16.8587 7.22603 16.7562C7.1274 16.2603 6.73977 15.8727 6.24391 15.7741C6.14142 15.7537 6.00065 15.75 5.50005 15.75C4.99944 15.75 4.85867 15.7537 4.75618 15.7741C4.26032 15.8727 3.8727 16.2603 3.77407 16.7562C3.75368 16.8587 3.75005 16.9994 3.75005 17.5V19.5C3.75005 20.0007 3.75368 20.1414 3.77407 20.2439C3.8727 20.7398 4.26032 21.1274 4.75618 21.226C4.85867 21.2464 4.99944 21.25 5.50005 21.25C6.00065 21.25 6.14142 21.2464 6.24391 21.226C6.73977 21.1274 7.1274 20.7398 7.22603 20.2439C7.24641 20.1414 7.25005 20.0007 7.25005 19.5V17.5ZM16.75 19.5C16.75 20.0007 16.7537 20.1414 16.7741 20.2439C16.8727 20.7398 17.2603 21.1274 17.7562 21.226C17.8587 21.2464 17.9994 21.25 18.5 21.25C19.0007 21.25 19.1414 21.2464 19.2439 21.226C19.7398 21.1274 20.1274 20.7398 20.226 20.2439C20.2464 20.1414 20.25 20.0007 20.25 19.5V17.5C20.25 16.9994 20.2464 16.8587 20.226 16.7562C20.1274 16.2603 19.7398 15.8727 19.2439 15.7741C19.1414 15.7537 19.0007 15.75 18.5 15.75C17.9994 15.75 17.8587 15.7537 17.7562 15.7741C17.2603 15.8727 16.8727 16.2603 16.7741 16.7562C16.7537 16.8587 16.75 16.9994 16.75 17.5V19.5Z" fill="currentColor"/>
                            </svg>                                
                            </div>
                          </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="p-2 border-2 border-gray-200 border-dashed rounded-lg mt-4">
            {{-- content (slot on layouts/app.blade.php)--}}
            <div>
                <div>
                    <div class="grid grid-cols-1 2xl:grid-cols-2 gap-4">
                        {{-- box 1 --}}
                        <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                            <div class="flex items-center justify-between mb-4">
                              <h3 class="text-xl font-bold leading-none text-gray-900 first-letter:capitalize">la liste d'utilisateurs</h3>
                              <a href="{{ route('admin.gestionUtilisateurs.index') }}" class="text-sm font-medium text-blue-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                                Afficher tout
                              </a>
                            </div>
                            <div class="flow-root">
                              @if(\App\Models\User::count() === 0)
                              <p class="p-4 text-gray-500 text-center">Aucun utilisateur sur la plateforme.</p>
                              @else
                              <ul role="list" class="divide-y divide-gray-200">
                                @foreach (\App\Models\User::take(5)->get() as $user)
                                <li class="py-3 sm:py-4">
                                  <div class="flex items-center space-x-4">
                                    <div class="flex-1 min-w-0">
                                      <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $user->name }}
                                      </p>
                                      <p class="text-sm text-gray-500 truncate">
                                        {{ $user->email }}
                                      </p>
                                    </div>
                                  </div>
                                </li>
                                @endforeach
                              </ul>
                              @endif
                            </div>
                          </div>
                        {{-- box 1 close --}}
                        {{-- box 2 --}}
                        <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                            <div class="flex items-center justify-between mb-4">
                              <h3 class="text-xl font-bold leading-none text-gray-900 first-letter:capitalize">la liste des garage</h3>
                              <a href="{{ route('admin.gestionGarages.index') }}" class="text-sm font-medium text-blue-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                                Afficher tout
                              </a>
                            </div>
                            <div class="flow-root">
                              @if(\App\Models\garage::count() === 0)
                              <p class="p-4 text-gray-500 text-center">Aucun garage disponible sur la plateforme.</p>
                              @else
                              <ul role="list" class="divide-y divide-gray-200">
                                @foreach (\App\Models\garage::take(5)->get() as $garage)
                                <li class="py-3 sm:py-4">
                                  <div class="flex items-center space-x-4">
                                    <div class="flex-1 min-w-0">
                                      <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $garage->name }}
                                      </p>
                                      <p class="text-sm text-gray-500 truncate">
                                        {{ $garage->localisation }}
                                      </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                      <a href="{{route('admin.gestionGarages.show',$garage->id)}}" class="text-sm font-medium text-blue-600 inline-flex items-center p-2 capitalize hover:underline">Détails</a>
                                    </div>
                                  </div>
                                </li>
                                @endforeach
                              </ul>
                              @endif
                            </div>
                          </div>
                        {{-- box 2 close --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- contet close colse --}}
        {{-- footer --}}
        <div class="p-2 border-2 border-gray-200 border-dashed rounded-lg mt-4">
            @include('layouts.footer')
        </div>
    </div>
</x-admin-app-layout>


