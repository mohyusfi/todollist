<div>
    <x-card
        :title="$todo->title"
        :description="$todo->description"
        :created="$todo->created_at->diffForHumans()" />
</div>
