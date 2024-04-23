<div class="container mt-5">
    <div class="columns is-centered">
        <div class="column is-half">
            <form action="/posts">

                @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="field">
                    <div class="control has-icons-left">
                        <input type="text" class="input is-shadowless" placeholder="Search Something..." name="search" value="{{ request('search') }}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-primary" type="submit">Go</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>