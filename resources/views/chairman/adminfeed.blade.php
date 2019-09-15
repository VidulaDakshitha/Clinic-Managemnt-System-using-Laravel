<!DOCTYPE html>

<html>

<body>

        <div class="container">
                @if (count($feedbacks)>0)
                @foreach ($feedbacks as $feedback)
                    <div class="service left col-lg-6 col-md-12 col-sm-12 p-5">
                    
                    <h2 class="text-center">{{ $feedback->name }}</h2>
                    <p>{{ $feedback->email }}</p>
                        @if(!auth::guest())
                            @if(auth::user()->id == $feedback->doctor_id)
                                <form class="form" action="/ServiceTest/{{ $feedback->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" class="btn btn-danger" value="Remove">
                                </form>
                            @endif
                        @endif
                    </div>
                @endforeach
                @else
                <p>No Feedbacks to show</p>
                @endif    
            </div>


</body>

</html>
