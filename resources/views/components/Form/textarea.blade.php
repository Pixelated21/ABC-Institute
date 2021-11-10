<div>
    <label class="sr-only" for="message">Message</label>
    <textarea
        {{$attributes->merge(['class' => '
                          p-4
                          w-full
                          text-base text-neutral-600
                          placeholder-gray-300
                          transition
                          duration-500
                          ease-in-out
                          transform
                          border border-gray-200
                          rounded-lg
                          bg-gray-50
                          focus:outline-none
                          focus:border-transparent
                          focus:ring-2
                          focus:ring-white
                          focus:ring-offset-2
                          focus:ring-offset-gray-300'])}}
        placeholder="Message"
        rows="8"
        id="message"
    ></textarea>
</div>
