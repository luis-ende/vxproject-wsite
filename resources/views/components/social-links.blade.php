@props(['social_links' => []])

<div x-data="socialLinks()"
        class="flex flex-row space-x-5 self-start mt-5">
    @foreach($social_links as $key => $link)
        <a href="{{ $link }}"
           title="{{ ucfirst($key) }}"
           target="_popup"
           rel=""
           @click.prevent="openPopup(@js($link))"
           class="vxproject-button-primary w-10 h-10">
            @switch($key)
                @case('facebook')
                    @svg('ri-facebook-fill', ['class' => 'w-4 h-5'])
                    @break
                @case('twitter')
                    @svg('ri-twitter-fill', ['class' => 'w-4 h-5'])
                    @break
                @case('linkedin')
                    @svg('ri-linkedin-fill', ['class' => 'w-4 h-5'])
                    @break
                @case('whatsapp')
                    @svg('ri-whatsapp-fill', ['class' => 'w-4 h-5'])
                    @break
            @endswitch
        </a>

    @endforeach
</div>

<script>
    function socialLinks(link) {
        return {
            popupSize: {
                width: 780,
                height: 550
            },
            openPopup(link) {
                const verticalPos = Math.floor((window.innerWidth - this.popupSize.width) / 2),
                      horisontalPos = Math.floor((window.innerHeight - this.popupSize.height) / 2);

                const popup = window.open(link, 'social',
                    'width=' + this.popupSize.width + ',height=' + this.popupSize.height +
                    ',left=' + verticalPos + ',top=' + horisontalPos +
                    ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');
            }
        }
    }
</script>