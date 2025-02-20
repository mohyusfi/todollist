<div>
    <x-card
        wire:click="delete({{$todo->id}})"
        :id="$todo->id"
        :title="$todo->title"
        :description="$todo->description"
        :created="$todo->created_at->diffForHumans()" />
</div>
