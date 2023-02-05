<?php
class NewsModel extends Model{
	public function Index(){

		$this->query('SELECT * FROM news_posts ORDER BY created_date DESC');

		$rows = $this->resultSet();
        return $rows;
	}

	public function addPost(){
		$post = filter_input_array(INPUT_POST);

		if(isset($post['submit'])){
			$this->query('
					INSERT INTO news_posts (title, body, author) 
					VALUES(:title, :body, :author);
					');
		
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':author', $post['author']);

			$this->execute();
		}

		return;
	}

	public function boardMembers(){
		return;
	}
}