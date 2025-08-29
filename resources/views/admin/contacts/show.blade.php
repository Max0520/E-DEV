<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversation avec {{ $contact->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body { height: 100%; margin:0; background-color: #f0f2f5; }
        body { display: flex; flex-direction: column; }

        .chat-container { display: flex; height: calc(100vh - 56px); overflow: hidden; }
        .left-panel { width: 300px; background-color: #fff; border-right: 1px solid #dee2e6; padding: 20px; overflow-y: auto; }
        .right-panel { flex:1; display:flex; flex-direction:column; padding:20px; height:100%; }

        .chat-box { flex:1 1 auto; overflow-y:auto; padding:15px; background-color:#e5ddd5; border-radius:10px; margin-bottom:15px; display:flex; flex-direction:column; gap:10px; }
        .message-row { display:flex; align-items:flex-start; gap:10px; }
        .message { padding:10px 15px; border-radius:15px; max-width:80%; position:relative; }
        .message-client { background-color:#fff; align-self:flex-start; text-align:left; }
        .message-admin { background-color:#0d6efd; color:white; align-self:flex-end; text-align:right; }
        .message small { display:block; font-size:0.7rem; color:#666; margin-top:5px; }
        .avatar { width:30px; height:30px; border-radius:50%; background-color:#ccc; display:inline-block; margin-right:10px; vertical-align:top; }
        .message-admin .avatar { display:none; }

        .header { background-color:#0d6efd; color:white; padding:10px 20px; }

        form { flex-shrink:0; }
        @media (max-width:768px){ .chat-container{flex-direction:column;} .left-panel{width:100%; border-right:none; border-bottom:1px solid #dee2e6;} }
    </style>
</head>
<body>

<div class="header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Conversation avec {{ $contact->name }}</h5>
</div>

<div class="chat-container">
    <div class="left-panel">
        <h6>Infos client</h6>
        <p><strong>Nom :</strong> {{ $contact->name }}</p>
        <p><strong>Email :</strong> <span class="badge bg-info text-dark">{{ $contact->email }}</span></p>
        <p><strong>Date :</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="right-panel">
        <div class="chat-box" id="chat-box">
            {{-- Message initial du client --}}
            <div class="message-row">
                <span class="avatar"></span>
                <div class="message message-client">
                    {{ $contact->message }}
                    <small>{{ $contact->created_at->format('H:i') }}</small>
                </div>
            </div>

            {{-- Tous les replies --}}
            @foreach($contact->replies as $reply)
                @if($reply->sender === 'admin')
                    <div class="message-row" style="justify-content:flex-end;">
                        <div class="message message-admin">
                            {{ $reply->message }}
                            <small>{{ $reply->created_at->format('H:i') }}</small>
                        </div>
                    </div>
                @else
                    <div class="message-row">
                        <span class="avatar"></span>
                        <div class="message message-client">
                            {{ $reply->message }}
                            <small>{{ $reply->created_at->format('H:i') }}</small>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.contacts.reply', $contact) }}" method="POST" class="d-flex gap-2 mt-2">
            @csrf
            <textarea name="reply_message" class="form-control" rows="2" placeholder="Écrire une réponse..." required></textarea>
            <button class="btn btn-primary" type="submit">Envoyer</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto-scroll vers le dernier message à l'ouverture
    const chatBox = document.getElementById('chat-box');
    chatBox.scrollTop = chatBox.scrollHeight;
</script>

</body>
</html>
