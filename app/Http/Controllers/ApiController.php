<?php namespace App\Http\Controllers;

use App\Word;
use App\Sign;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Response;

class ApiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return view
	 */
	public function index()
	{
		return view('ApiGreet');
	}

	/**
	 * Checks whether we has a sign for the word
	 * @param  String $word - the query word
	 * @return boolean       JSON object with {word:boolean}
	 */
	public function hasSign($word)
	{
		$numWords = Word::where('word', $word)->count();
		$result[$word] = $numWords > 0;
		return $result;
	}

	/**
	 * Send a list of video id's for the signs for the word
	 * @param  String $word - the query word
	 * @return Response       List all JSON objects
	 */
	public function getSign($word)
	{
		$result = Word::join('signs', 'words.id', '=', 'signs.word_id')->where('words.word', $word)->whereNull('signs.deleted_at')->get(array('video_uuid as videoID', 'description', 'thumbnail_url as thumb', 'signs.created_at'));
		return $result;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
