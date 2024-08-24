<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\Post;
use App\Panitia;
use Illuminate\Http\Request;

class PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$posts = Post::all();

		return view('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		// dd(Auth::user()->user_id);
		$penulis = Panitia::where('user_id', Auth::user()->user_id)
								->first(['panitia_id', 'nama_lengkap']);
		// dd($penulis->panitia_id);
		return view('posts.create', compact('penulis'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// dd($request);
		$request->validate([
			'judul' => 'required',
			'slug' => 'required',
			'deskripsi' => 'required',
			'penulis' => 'required',
			// 'lampiran' => 'required|mimes:pdf|max:2048',
		]);

		$filePath = null;
		if ($request->file('lampiran')) {
			$file = $request->file('lampiran');
			$fileName = $file->getClientOriginalName();
			$filePath = 'berita/' . Date('Ymd') . '/' . $fileName;
			Storage::disk('public')->put($filePath, file_get_contents($file));
		}

		$post = new Post([
			'judul' => $request->get('judul'),
			'slug' => $request->get('slug'),
			'deskripsi' => $request->get('deskripsi'),
			'penulis' => $request->get('penulis'),
			'lampiran' => $filePath,
		]);
		$post->save();

		return redirect('/post')->with('success', 'Tambah Berita berhasil!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function show(Post $post)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		$penulis = Panitia::where('user_id', Auth::user()->user_id)
								->first(['panitia_id', 'nama_lengkap']);
		
		return view('posts.edit', compact(['post', 'penulis']));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// dd($request);
		$request->validate([
			'judul' => 'required',
			'slug' => 'required',
			'deskripsi' => 'required',
			'penulis' => 'required',
			'lampiran' => 'required|mimes:pdf|max:2048',
		]);

		// dd($request->file('lampiran'));
		if ($request->file('lampiran')) {
			$file = $request->file('lampiran');
			$fileName = $file->getClientOriginalName();
			$filePath = 'berita/' . Date('Ymd') . '/' . $fileName;
			Storage::disk('public')->put($filePath, file_get_contents($file));
		}

		$post = Post::find($id);
		$post->judul =  $request->get('judul');
		$post->slug = $request->get('slug');
		$post->deskripsi = $request->get('deskripsi');
		$post->lampiran = $filePath;
		$post->penulis = $request->get('penulis');
		$post->updated_at = date('Y-m-d H:i:s');
		$post->save();

		return redirect('/post')->with('success', 'Berita berhasil diubah!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		$post->delete();
		
		return redirect('/post')->with('success', 'Berita berhasil dihapus!');
	}
}
