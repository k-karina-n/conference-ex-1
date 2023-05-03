<div class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
    <h1>
        Congratulations with registration!
    </h1>
    <div class="mt-12">
        <p>Want to share it on social media?</p>
    </div>
</div>

<div class="mt-12">
    <div class="mt-5 md:col-span-2 md:mt-0">
        <div class="overflow-hidden shadow sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                <div class="grid gap-4 lg:gap-6">

                    <form hx-post="/shareOnSocialMedia" hx-trigger="submit" hx-target="#parent-div" hx-swap="innerHTML">
                        <div x-data="{ choice: 'decide' }">
                            <div x-show="choice === 'decide'">
                                <div class="mt-4 grid">
                                    <button type="button" @click="choice = 'select'" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">Yes, share on my social media.</button>
                                    <input type="hidden" name="title" value="<?= $title ?>">
                                </div>

                                <div class="mt-4 grid">
                                    <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">No, thanks!</button>
                                </div>
                            </div>

                            <div x-show="choice === 'select'">
                                <div class="mt-2 space-y-2">
                                    <label for="message" class="block text-sm text-gray-700 font-medium dark:text-white">To Post a Message</label>

                                    <p class="block text-sm text-gray-700 font-medium dark:text-white">
                                        <?= $message = "Hey, I'm speaking on '{$title}'! To know more about it, visit " ?> <a href="http://localhost:8888/list" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">conference.com</a>
                                    </p>
                                </div>

                                <div class="mt-2 space-y-2">
                                    <label for="message" class="block text-sm text-gray-700 font-medium dark:text-white">Select Your Option Below</label>
                                </div>

                                <div class="mt-6 grid">
                                    <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">
                                        <a target="blank" href="http://twitter.com/share?text=<?= $message; ?>&hashtags=conference,speaker,mypublicspeech">Post on Twitter</a>
                                    </button>
                                </div>

                                <div class="mt-6 grid">
                                    <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">
                                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://localhost:8888/list<?= $message; ?>">Post on Facebook</a>
                                    </button>
                                </div>

                                <div class="mt-6 grid">
                                    <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800">
                                        Submit
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>